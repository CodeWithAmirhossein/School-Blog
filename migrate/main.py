import mysql.connector

connection = mysql.connector.connect(
    host="localhost",
    user="amir",
    password="amir"
)

cursor = connection.cursor()

cursor.execute("CREATE DATABASE blog")

db_file = open("pack/etc/db.sql", "r")
table = db_file.read()

cursor.execulte(table)