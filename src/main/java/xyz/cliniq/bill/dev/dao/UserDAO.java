package xyz.cliniq.bill.dev.dao;


import lombok.*;

import javax.persistence.*;
import java.math.BigDecimal;
import java.util.List;

@Builder
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@Entity
@Table(name = "User")
public class UserDAO {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Integer userId;

    @Column(name = "salaryNetto")
    private BigDecimal salaryNetto;

    @Column(name = "firstName")
    private String firstName;

    @Column(name = "lastName")
    private String lastName;

    @Column(name = "phoneNumber")
    private String phoneNumber;

    @Column(name = "email")
    private String email;

    @Column(name = "address")
    private String address;

    @Column(name = "userRoleDAO")
    @ManyToMany(cascade = CascadeType.ALL)
    @JoinTable(
            name = "UserRoles",
            joinColumns = {@JoinColumn(name = "userId")},
            inverseJoinColumns = {@JoinColumn(name = "roleId")}
    )
    private List<UserRoleDAO> userRoleDAO;
/*
    @Column(name = "salaries")
    @ManyToMany(cascade = CascadeType.ALL)
    @JoinTable(
            name = "UserSalaries",
            joinColumns = {@JoinColumn(name = "userId")},
            inverseJoinColumns = {@JoinColumn(name = "salaryId")}
    )
    private List<Salary> salaries;*/
}
