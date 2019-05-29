package xyz.cliniq.bill.dev.exceptions;

import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.ResponseStatus;

@ResponseStatus(value = HttpStatus.NOT_ACCEPTABLE, reason = "UserDAO List is empty!")
public class UserListIsNullException extends RuntimeException{
}