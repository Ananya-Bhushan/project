import pyttsx3
import speech_recognition as sr
import smtplib
from email.message import EmailMessage
import datetime

dict = {'satyam':'satyamkj24764@gmail.com',
    'ishika': 'ishikagupta2108@gmail.com',
    'ananya': 'applicationform1512@gmail.com',
    'Aradhya': 'aradhyaglitters@gmail.com'}

engine = pyttsx3.init('sapi5') 
voices = engine.getProperty('voices') # getting different voices
engine.setProperty('voice',voices[0].id) # first voice chosen
engine.setProperty('rate',180)

def speak(audio):
    engine.say(audio)
    engine.runAndWait()

def wishMe():
    hour = int(datetime.datetime.now().hour)
    if hour>=0 and hour<12:
        speak("Good Morning!, To Whom do you want to send email?")

    elif hour>=12 and hour<18:
        speak("Good Afternoon!,To Whom do you want to send email?")   

    else:
        speak("Good Evening!,To Whom do you want to send email?")

def listen(): 
    r = sr.Recognizer()
    with sr.Microphone() as source:
        r.pause_threshold=1
        print("listening.....")
        r.pause_threshold=1
        audio = r.listen(source)
    try:
        print("Recognizing.....")
        query = r.recognize_google(audio, language = 'en-in')
        print(f"User said:{query}\n")
    except Exception as e:
        speak("Say that again please...")
        return "None"
    return(query) # user's speech returned as string

def send_email(receiver, subject, message):
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.starttls()
    server.login('youremailid', 'password')
    email = EmailMessage()
    email['From'] = 'youremailid'
    email['To'] = receiver
    email['Subject'] = subject
    email.set_content(message)
    server.send_message(email)

if __name__ == "__main__":
    wishMe()
    while(True): 
        query = listen().lower()
        if 'email to' in query:
            try:
                name = list(query.split()) # extract receiver's name
                name = name[name.index('to')+1]
                speak("tell me the subject?")
                subject=listen()
                speak("Tell me the text you wanna send?")
                content = listen()
                to = dict[name]
                send_email(to,subject,content)
                speak("email has been sent")
            except Exception as e:
                print(e)
                speak("sorry unable to send the email at the moment.Try again")

        elif "exit" in query:
            speak("Bye Bye Ma'am. I'm going to sleep now, Wake me up if you want to send some more emails")
            quit()
            

