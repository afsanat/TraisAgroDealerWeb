from pydantic import BaseModel

class Login(BaseModel):
    biometric_fingerprint :str

class Token(BaseModel):
    token :str

class Subsiy_Registration(Token,BaseModel):
    #Farming Information#
    farming_type:int
    ##For crop production ##
    #Past year Assessment #
    last_season_status : bool
    last_season_crop:str
    yield_status:float
    last_season_feltilizer_type:str
    last_season_feltilizer_size:float
    # Current Year #
    crop_type:str
    seeds:float
    fertilizer:float
    ##Farm Infomation##
    land_size:float
    land_use:float
    current_year_land_use:float
    machinery_type :int
    labour : int
    #Farm location
    lat:str
    long:str
    
    
    
    
    
    