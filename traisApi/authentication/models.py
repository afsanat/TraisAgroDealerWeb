from sqlalchemy import Column, Integer, String, Boolean, ForeignKey, Float,DateTime
from sqlalchemy.orm import relationship
from general.settings import Base
from datetime import datetime
class Authentication(Base):
    __tablename__ = "authentication"
    
    id = Column(Integer, primary_key=True, index=True)
    token = Column(String, unique=True, index=True)  
    expire_time = Column(DateTime, default=datetime.now()) 
    user_id = Column(Integer, ForeignKey('users.id'), unique=True)
    user = relationship("User", back_populates="authentication")

    def is_expired(self):
        return datetime.now() > self.expire_time
    