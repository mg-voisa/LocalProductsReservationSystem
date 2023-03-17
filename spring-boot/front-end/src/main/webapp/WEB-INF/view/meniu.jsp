<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/fmt" prefix="fmt"%>
<%@taglib uri="http://www.springframework.org/tags" prefix="spring"%>
<%@include file="pages/includes/path.jsp"%>

<!DOCTYPE html>
<html lang="en">
<%@include file="head.jsp"%>
  
<body>
  <%@include file="meniu/meniuPrincipal.jsp"%>

  <main id="main">
      <section class="breadcrumbs">
        <div class="container">
          <div class="section-title">
            <h2>Alege din meniul nostru!</h2>
          </div>
        </div>
      </section>
      <section class="inner-page">
        <div class="container">
          <!-- ======= Menu Section ======= -->
          <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">
              <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                  <ul id="menu-flters">
                    <li data-filter="*" class="filter-active">Toate</li>
                    
                    <li data-filter=".filter-row_filtru">
                      row_filtru01
                    </li>
                    <li data-filter=".filter-row_filtru">
                      row_filtru02
                    </li>
                    <li data-filter=".filter-row_filtru">
                      row_filtru03
                    </li>
                    <li data-filter=".filter-row_filtru">
                      row_filtru04
                    </li>
                    <!-- <li data-filter=".filter-salads">Salads</li>
                        <li data-filter=".filter-specialty">Specialty</li> -->
                    
                  </ul>
                </div>
              </div>
              <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                <c:forEach items="${products}" var="product">
                <div class="col-lg-6 menu-item filter-rowProd_categorie">
                  <img src="/resources/img/menu/bread-barrel.jpg" class="menu-img" alt="">
                  <div class="menu-content">
                    <a href="#">
                      ${product.produs}
                    </a>
                    <span>
                      ${product.pret}  
                      lei
                    </span>
                  </div>
                  
                  
                  <div class="menu-ingredients">
                    (ingrediente nu-s!)
                  </div>
                </div>
                </c:forEach>
              </div>
            </div>
          </section>
          <!-- End Menu Section -->
        </div>
      </section>
    </main>
  <!-- End #main -->
  
      
<%@include file="footer.jsp"%>
<%@include file="scripts.jsp"%>

</body>
</html>
