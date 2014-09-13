#-*- encoding: utf-8 -*-

import peewee
from peewee import *
import urllib2
import simplejson
import time

db = SqliteDatabase('database.db')


class DBModel(Model):
    class Meta:
        database = db


class Liste(DBModel):
    id = peewee.BigIntegerField()
    name = peewee.CharField(max_length=200)
    first_name = peewee.CharField(max_length=100)
    last_name = peewee.CharField(max_length=100)
    link = peewee.CharField(max_length=255)
    username = peewee.CharField(max_length=100)
    gender = peewee.CharField(max_length=10)
    locale = peewee.CharField(max_length=10)


class Status(DBModel):
    id = peewee.IntegerField(default=1)
    xnow = peewee.IntegerField(default=1)
    last_success = peewee.IntegerField(default=1)

db.connect()
try:
    Liste.create_table()
except:
    pass

First = False

try:
    Status.create_table()
    First = Status.create(id="1", xnow="1", last_success="1")
except:
    pass

while True:
    time.sleep(2)
    try:
        pointer = Status.get(id=1)
        if (pointer.xnow - pointer.last_success) > 70:
            pointer = Status.update((Status.xnow + 1) * 1000)
            pointer.where(Status.id == 1).execute()
            pointer = Status.get(id=1)

        print pointer.xnow
        addr = urllib2.Request("http://graph.facebook.com/%s" % pointer.xnow)
        opener = urllib2.build_opener()
        f = opener.open(addr)
        f = simplejson.load(f)
    except Exception as e:
        # TODO: Internet gidince calisma durmali
        print e

    try:
        if len(f) == 8:
            print f
            #Liste.create(f)
            Liste.create(id=f['id'], name=f['name'], first_name=f['first_name'],
                         last_name=f['last_name'], link=f['link'], username=f['username'],
                         gender=f['gender'], locale=f['locale'])
            pointer = Status.update(last_success=(Status.last_success + 1))
            pointer.where(id == 1).execute()
        else:
            print f
    except Exception as e:
        print e
    finally:
        pointer = Status.update(xnow=Status.xnow + 1)
        pointer.where(Status.id == 1).execute()