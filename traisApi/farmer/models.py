
from sqlalchemy import Column, Integer, String, Boolean, ForeignKey, Float
from sqlalchemy.orm import relationship
from general.settings import Base

class User(Base):
    __tablename__ = "users" 

    id = Column(Integer, primary_key=True, index=True)
    first_name = Column(String)
    surname = Column(String)
    authentication = relationship("Authentication", uselist=False, back_populates="user")

class Farmer(User):
    __tablename__ = "farmers"  

    id = Column(Integer, ForeignKey('users.id'), primary_key=True)
    on_subsidy = Column(Boolean, default=False)
    biometric_template = Column(String, nullable=False)

    # One-to-one relationship with Subsidy
    subsidy_id = Column(Integer, ForeignKey('subsidies.id'))
    subsidy = relationship("Subsidy", back_populates="farmer", uselist=False)
    
    # One-to-one relationship with FarmingInfo
    farming_info_id = Column(Integer, ForeignKey('farming_info.id'))
    farming_info = relationship("FarmingInfo", back_populates="farmer", uselist=False)


class FarmingInfo(Base):
    __tablename__ = "farming_info"

    id = Column(Integer, primary_key=True, index=True)
    farming_type = Column(Integer, nullable=False)
    
    # For crop production
    last_season_status = Column(Boolean, nullable=False)
    last_season_crop = Column(String, nullable=False)
    yield_status = Column(Float, nullable=False)
    last_season_fertilizer_type = Column(String, nullable=False)
    last_season_fertilizer_size = Column(Float, nullable=False)
    
    # Current Year
    crop_type = Column(String, nullable=False)
    seeds = Column(Float, nullable=False)
    fertilizer = Column(Float, nullable=False)
    
    # Farm Information
    land_size = Column(Float, nullable=False)
    land_use = Column(Float, nullable=False)
    current_year_land_use = Column(Float, nullable=False)
    machinery_type = Column(Integer, nullable=False)
    labour = Column(Integer, nullable=False)
    
    # Farm location
    lat = Column(String, nullable=True)
    long = Column(String, nullable=True)
    
    # One-to-one relationship with Farmer
    farmer = relationship("Farmer", back_populates="farming_info", uselist=False)
