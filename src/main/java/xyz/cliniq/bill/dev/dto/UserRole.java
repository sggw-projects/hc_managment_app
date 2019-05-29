package xyz.cliniq.bill.dev.dto;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class UserRole {

    private Integer userRoleId;
    private String userRole;
    private String description;
}
