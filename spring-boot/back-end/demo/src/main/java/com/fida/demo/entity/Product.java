package com.fida.demo.entity;


import java.sql.Timestamp;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "produse")
public class Product {
	@GeneratedValue(strategy=GenerationType.IDENTITY) // automatically generated primary key.
	@Id  // Primary key.
	@Column(name="id")
	private Long id;
	
	
	@Column(name = "id_categorie", nullable=false)
	private Long id_categorie;

	@Column(name = "produs")
	private String produs;

	@Column(name = "pret")
	private double pret;
	
	@Column(name = "poza")
	private String poza;
	
	@Column(name = "created_at")
	private Timestamp created_at;
	
	@Column(name = "modified_at")
	private Timestamp modified_at;
	
	@Column(name = "url_img")
	private String url_img;
	
	@Column(name = "sters")
	private int sters;
	
	@Column(name = "ingrediente")
	private String ingrediente;

	public Product(Long id, Long id_categorie, String produs, double pret, String poza, Timestamp created_at,
			Timestamp modified_at, String url_img, int sters, String ingrediente) {
		super();
		this.id = id;
		this.id_categorie = id_categorie;
		this.produs = produs;
		this.pret = pret;
		this.poza = poza;
		this.created_at = created_at;
		this.modified_at = modified_at;
		this.url_img = url_img;
		this.sters = sters;
		this.ingrediente = ingrediente;
	}

	public Product() {
		super();
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Long getId_categorie() {
		return id_categorie;
	}

	public void setId_categorie(Long id_categorie) {
		this.id_categorie = id_categorie;
	}

	public String getProdus() {
		return produs;
	}

	public void setProdus(String produs) {
		this.produs = produs;
	}

	public double getPret() {
		return pret;
	}

	public void setPret(double pret) {
		this.pret = pret;
	}

	public String getPoza() {
		return poza;
	}

	public void setPoza(String poza) {
		this.poza = poza;
	}

	public Timestamp getCreated_at() {
		return created_at;
	}

	public void setCreated_at(Timestamp created_at) {
		this.created_at = created_at;
	}

	public Timestamp getModified_at() {
		return modified_at;
	}

	public void setModified_at(Timestamp modified_at) {
		this.modified_at = modified_at;
	}

	public String getUrl_img() {
		return url_img;
	}

	public void setUrl_img(String url_img) {
		this.url_img = url_img;
	}

	public int getSters() {
		return sters;
	}

	public void setSters(int sters) {
		this.sters = sters;
	}

	public String getIngrediente() {
		return ingrediente;
	}

	public void setIngrediente(String ingrediente) {
		this.ingrediente = ingrediente;
	}

	@Override
	public String toString() {
		return "Product [id=" + id + ", id_categorie=" + id_categorie + ", produs=" + produs + ", pret=" + pret
				+ ", poza=" + poza + ", created_at=" + created_at + ", modified_at=" + modified_at + ", url_img="
				+ url_img + ", sters=" + sters + ", ingrediente=" + ingrediente + "]";
	} 
	
	
}
