from fastapi import FastAPI, HTTPException
from .pdmodels import Login, Token, Subsiy_Registration
from .models import FarmingInfo
from general.settings import session

# Farmer login function
def farmer_login(request:Login):

    return  {"message": "","auth_token":token}
# retrieving farmer programs subscribed 
# def farmer_programs(request:Token):
#     #check if the token has not expired

#     #fetch program data

#     return {}

def subsidy_registration(data):
    
    
    return {"message":"status"}
    
    