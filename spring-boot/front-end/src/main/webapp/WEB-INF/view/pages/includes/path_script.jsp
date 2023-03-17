<%-- <%@ page import="com.fida.model.VitalConst"  %> --%>
<%
String path_script = request.getContextPath();
System.out.println("path_script:"+path_script);
//for deploy

//@todo de vazut care i domeniul!!!!
if(request.getServerName().toLowerCase().contains("local_prod.licenta.ro")){
	path_script = ""; 
}
//path="";
        
%>