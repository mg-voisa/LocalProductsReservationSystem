
<%
String path_footer = request.getContextPath();
System.out.println("path_footer:"+path_footer);
//for deploy

//@todo de vazut care i domeniul!!!!
if(request.getServerName().toLowerCase().contains("local_prod.licenta.ro")){
	path_footer = ""; 
}
//path="";
        
%>