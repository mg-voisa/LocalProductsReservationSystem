<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@include file="pages/includes/path_script.jsp"%>


<script src="<%=path_script%>/resources/js/aos.js"></script>

<script src="<%=path_script%>/resources/js/glightbox.min.js"></script>

<script src="<%=path_script%>/resources/js/swiper-bundle.min.js"></script>
<script src="<%=path_script%>/resources/js/jquery-3.3.1.min.js"></script>
<script src="<%=path_script%>/resources/js/jquery-ui(1.12.1).js"></script>
<!-- Template Main JS File -->
<script src="<%=path_script%>/resources/js/main.js"></script>
<script>
  // $(document).foundation();
  $(document).ready(function() {

    $('.callout.alert').each(function() {
      $(this).delay($(this).data('delay')).fadeOut();
    });
  });

 
</script>