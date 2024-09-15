#creating database tables
from .settings import engine, Base
from farmer.models import *
from subsidy_program.models import *

Base.metadata.create_all(bind=engine)