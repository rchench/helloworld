Some docs:
- https://weread.qq.com/web/reader/08232ac0720befa90825d88
- https://www.runoob.com/python3/python3-tutorial.html
- https://docs.python.org/zh-cn/3/tutorial/index.html

Some videos:
- https://www.youtube.com/watch?v=yMOU8_hhLL8
- https://www.youtube.com/watch?v=kqtD5dpn9C8

```
# interactive mode to run multiple hello
python3 hello_world.py
# run only one hello
python3 hello_world.py num

# run python in a given string
python3 -c 'print("hello world")'

# inspect interactively after running script
python3 -i hello_world.py

# install pygame
python3 -m pip install -U pygame --user
python3 -m pygame.examples.aliens

# install matplotlib
python3 -m pip install -U matplotlib
python3 -c 'import matplotlib; print(matplotlib.__version__, matplotlib.__file__)'
python3 hello_mpl.py

# install plotly
python3 -m pip install plotly
python3 hello_plotly.py

# install django
python3 -m pip install Django
python3 -m django --version
django-admin startproject mysite
cd mysite
python3 manage.py runserver
```