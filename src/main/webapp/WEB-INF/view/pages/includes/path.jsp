<%-- <%@ page import="com.fida.model.VitalConst"  %> --%>
<%
String path = request.getContextPath();
//for deploy

//@todo de vazut care i domeniul!!!!
if(request.getServerName().toLowerCase().contains("local_prod.licenta.ro")){
	path = ""; 
}
//path="";
        
%>