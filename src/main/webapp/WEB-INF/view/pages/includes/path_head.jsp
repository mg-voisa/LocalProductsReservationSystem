
<%
String path_head = request.getContextPath();
System.out.println("path:"+path_head);
//for deploy

//@todo de vazut care i domeniul!!!!
if(request.getServerName().toLowerCase().contains("local_prod.licenta.ro")){
	path_head = ""; 
}
//path="";
        
%>