from .models import Authentication
from general.settings import session
import secrets
from datetime import datetime, timedelta

def verify_token(token:str):
    auth_token = session.query(Authentication).filter_by(token=token).first()
    if auth_token and auth_token.is_expired:
        return True
    else:
        return False
    
    
def _session_token_gen(length=32):
    token = secrets.token_hex(length // 2)
    return token

def auth_login(user_id):
    token = _session_token_gen()
    expire_time = datetime.now() + timedelta(minutes=5)
    new_auth = Authentication(token=token,expire_time=expire_time,user_id=user_id)
    session.add(new_auth)
    session.commit()
    session.refresh(new_auth)

    