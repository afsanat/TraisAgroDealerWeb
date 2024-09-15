
# Import necessary classes and types from SQLAlchemy
from sqlalchemy import Column, Integer, String, Boolean, Float, DateTime
from sqlalchemy.orm import relationship
from general.settings import Base
from farmer.models import Farmer

class Subsidy(Base):
    __tablename__ = "subsidies"  

    id = Column(Integer, primary_key=True, index=True)
    year = Column(DateTime, nullable=False) 
    allocation_percentage = Column(Float, nullable=False)
    
    # One-to-one relationship with Farmer
    farmer = relationship("Farmer", back_populates="subsidy", uselist=False)
