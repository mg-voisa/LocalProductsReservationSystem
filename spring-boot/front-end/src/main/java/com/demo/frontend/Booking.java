package com.demo.frontend;

public class Booking {
    private String id;
    private String name;
    private String pret;
	public String getId() {
		return id;
	}
	public void setId(String id) {
		this.id = id;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getPret() {
		return pret;
	}
	public void setPret(String pret) {
		this.pret = pret;
	}
	public Booking(String id, String name, String pret) {
		super();
		this.id = id;
		this.name = name;
		this.pret = pret;
	}
	public Booking() {
		super();
	}
	@Override
	public String toString() {
		return "Booking [id=" + id + ", name=" + name + ", pret=" + pret + "]";
	}
	

    //getters, setters, constructors and toString
    
}
