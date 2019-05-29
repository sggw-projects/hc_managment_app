package xyz.cliniq.bill.dev.exceptions;

import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.ResponseStatus;

@ResponseStatus(value = HttpStatus.NOT_ACCEPTABLE, reason = "User Role does not exists!")
public class UserRoleIsNotPresent extends RuntimeException{
}