REST SERVICES LIST:
---------------------------------------------------------------------------------
App Config Params:
---------------------------------------------------------------------------------
READING APP CONFIG DATA
---------------------------------------------------------------------------------
1) ServiceName - 
   URL: http://localhost/codeBuilder/web/app-config/app/config/view/multiple
   METHOD: POST
   DATA: { keys:['ABC']}
   
2) ServiceName - 
   URL: http://localhost/codeBuilder/web/app-config/app/config/view/all
   METHOD: POST
   DATA: -
   
3) ServiceName - 
   URL: http://localhost/codeBuilder/web/app-config/app/config/view/<param>
   METHOD: POST
   DATA: -
---------------------------------------------------------------------------------
WRITING APP CONFIG DATA
---------------------------------------------------------------------------------    
4) ServiceName - 
   URL: http://localhost/codeBuilder/web/app-config/app/config/addupdate/multiple
   METHOD: POST
   DATA: { data:{"eef":"def"} }

5) ServiceName - 
   URL: http://localhost/codeBuilder/web/app-config/app/config/<key-param>/<value-param>
   METHOD: POST
   DATA: { data:{"eef":"def"} }
---------------------------------------------------------------------------------------
