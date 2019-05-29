package xyz.cliniq.bill.dev.dto;

import lombok.*;

import java.math.BigDecimal;
import java.util.List;

@Builder
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class User {

    private Integer userId;
    private BigDecimal salaryNetto;
    private String firstName;
    private String lastName;
    private String phoneNumber;
    private String email;
    private String address;
    private List<UserRole> userRole;
}
