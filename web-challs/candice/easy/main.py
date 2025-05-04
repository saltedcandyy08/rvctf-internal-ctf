from flask import Flask, render_template, request
import sqlite3
import os

app = Flask(__name__)

def connect_db(db_path):
    try:
        conn = sqlite3.connect(db_path)
        print('Database connected:', os.path.abspath(db_path))
        return conn
    except Exception as e:
        print(e)

def search(username, password, conn):
    query = f"SELECT * FROM users WHERE username = '{username}' AND password = '{password}'"
    try:
        cur = conn.cursor()
        cur.execute(query)
        result = cur.fetchall()
        return result, None
    except Exception as e:
        return None, f'Error: {e}'


@app.route('/')
def index():
    return render_template('index.html')

@app.route('/login/', methods=['GET'])
def login():
    username = request.args['username']
    password = request.args['password']
    db_path = 'rvctf database (real).db'
    conn = connect_db(db_path)
    result, error = search(username, password, conn)
    return render_template('result.html', result=result, error=error)


if __name__ == '__main__':
    app.run(debug=True, port=5000)

