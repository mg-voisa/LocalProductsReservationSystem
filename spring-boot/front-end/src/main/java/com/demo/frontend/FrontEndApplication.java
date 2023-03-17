package com.demo.frontend;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.ServletRegistration;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.builder.SpringApplicationBuilder;
import org.springframework.boot.web.servlet.support.SpringBootServletInitializer;
import org.springframework.context.annotation.Bean;
import org.springframework.web.context.ContextLoaderListener;
import org.springframework.web.context.support.AnnotationConfigWebApplicationContext;
import org.springframework.web.context.support.GenericWebApplicationContext;
import org.springframework.web.servlet.DispatcherServlet;
import org.springframework.web.servlet.ViewResolver;
import org.springframework.web.servlet.config.annotation.ResourceHandlerRegistry;
import org.springframework.web.servlet.config.annotation.ViewControllerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;
import org.springframework.web.servlet.view.InternalResourceViewResolver;
import org.springframework.web.servlet.view.JstlView;

@SpringBootApplication
public class FrontEndApplication extends SpringBootServletInitializer implements WebMvcConfigurer{

	
	
	
	@Override
	public void onStartup(ServletContext servletContext) throws ServletException {
		AnnotationConfigWebApplicationContext root = 
		          new AnnotationConfigWebApplicationContext();
		        
		        root.scan("com.demo.frontend");
		        servletContext.addListener(new ContextLoaderListener(root));

		        ServletRegistration.Dynamic appServlet = 
		        		servletContext.addServlet("mvc", new DispatcherServlet(new GenericWebApplicationContext()));
		        appServlet.setLoadOnStartup(1);
		        appServlet.addMapping("/");
	}

	@Override
	protected SpringApplicationBuilder configure(SpringApplicationBuilder builder) {
		return builder.sources(FrontEndApplication.class);
	}

	public static void main(String[] args) {
		SpringApplication.run(FrontEndApplication.class, args);
	}

	@Override
	public void addResourceHandlers(ResourceHandlerRegistry registry) {
		System.out.println("config resources!");
		
//		registry.addResourceHandler("/resources/**").addResourceLocations("/resources/static/");;
		registry.addResourceHandler("/resources/**").addResourceLocations("/resources/");
//		registry.addResourceHandler("/resources/css/**").addResourceLocations("/css/").setCachePeriod(31556926);
//	    registry.addResourceHandler("/resources/img/**").addResourceLocations("/img/").setCachePeriod(31556926);
//	    registry.addResourceHandler("/resources/js/**").addResourceLocations("/js/").setCachePeriod(31556926);
	}
	
	 @Override
	   public void addViewControllers(ViewControllerRegistry registry) {
	      registry.addViewController("/").setViewName("index");
	   }

	 @Bean
	   public ViewResolver viewResolver() {
		   System.out.println("viewResolver access!");
	      InternalResourceViewResolver bean = new InternalResourceViewResolver();

	      bean.setViewClass(JstlView.class);
	      bean.setPrefix("/WEB-INF/view/");
	      bean.setSuffix(".jsp");

	      return bean;
	   }

}
