#include <WiFi.h>
#include <ESPAsyncWebServer.h>
#include <Servo.h>

#define vibSensor 33
#define power 32
#define windmill 12
Servo myservo;
AsyncWebServer server(80);

int timeDelay = 5000;
bool trig = false, pNet = false, wind = false;
const char* ssid     = "Kak_Tarua_Portable_WiFI";
const char* password = "12345678";
int pos = 90;

IPAddress local_ip(192,168,0,1);
IPAddress gateway(192,168,0,1);
IPAddress subnet(255,255,255,0);

void setup()
{
  Serial.begin(115200);

  pinMode(vibSensor, INPUT_PULLUP);
  pinMode(power, OUTPUT);
  digitalWrite(power, HIGH);
  pinMode(windmill,INPUT);
  myservo.attach(14);
  myservo.write(pos);
}

void loop()
{
  if(analogRead(windmill) > 1000)
  {
    wind=true;
  }

  if(wind && analogRead(windmill) < 600 )
  {
    trig = true;    
  }
  
  if(digitalRead(vibSensor) == 0)
  {
    trig = true;
  }

  if(trig)
  {
    delay(timeDelay);
    sysOn();
    pos = 180;
  }
  else
  {
    sysOff();
  }
}

void sysOff()
{
  digitalWrite(power, HIGH);
}

void sysOn()
{
  digitalWrite(power, LOW);
   
  myservo.write(pos);
  
  if(!pNet)
  {
    WiFi.mode(WIFI_AP);
    WiFi.softAPConfig(local_ip, gateway, subnet);
    WiFi.softAP(ssid, password);
    Serial.print("[+] AP Created with IP Gateway ");
    Serial.println(WiFi.softAPIP());

    server.on("/", HTTP_GET, [](AsyncWebServerRequest *request){
    request->send(200, "text/html", "<html><body><h1>Kak Tarua Help</h1><button onclick=\"myFunction()\">Get Help</button><script>function myFunction(){alert('Help Requested!');}</script></body></html>");
    });

    //server.on("/", HTTP_GET, [](AsyncWebServerRequest *request){
    //request->send(SPIFFS, "/index.html", "text/html");
    //});

    server.begin();

    pNet = true;
  }
}
