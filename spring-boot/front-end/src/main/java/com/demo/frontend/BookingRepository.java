package com.demo.frontend;

import java.util.Collection;

public interface BookingRepository {
	Collection<Booking> getBooks();
    Booking addBook(Booking book);
}
