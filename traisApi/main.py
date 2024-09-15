from fastapi import FastAPI, HTTPException
from farmer.pdmodels import Subsiy_Registration
from farmer.models import FarmingInfo
from fastapi.middleware.cors import CORSMiddleware

app = FastAPI()

# Allow CORS from specific origins
orig_origins = [
    "https://trais-agro-dealer-web.vercel.app/",  # React app URL 
]

# Add CORS middleware
app.add_middleware(
    CORSMiddleware,
    allow_origins=["https://trais-agro-dealer-web.vercel.app"],
    allow_credentials=True,
    allow_methods=["*"],  # Allow all HTTP methods (ex:GET, POST)
    allow_headers=["*"],  # Allow all headers
)

@app.get('/')
async def index():
    return {"Status":"System is Up"}

#Farmer end points - subsidy information
@app.post('/subsidy/registration')
async def subsidy_register(request:Subsiy_Registration):
        new_farming_info = FarmingInfo(
        farming_type=request.farming_type,
        last_season_status=request.last_season_status,
        last_season_crop=request.last_season_crop,
        yield_status=request.yield_status,
        last_season_fertilizer_type=request.last_season_feltilizer_type,
        last_season_fertilizer_size=request.last_season_feltilizer_size,
        crop_type=request.crop_type,
        seeds=request.seeds,
        fertilizer=request.fertilizer,
        land_size=request.land_size,
        land_use=request.land_use,
        current_year_land_use=request.current_year_land_use,
        machinery_type=request.machinery_type,
        labour=request.labour,
        lat=request.lat,
        long=request.long
    )
    
    
