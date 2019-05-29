package xyz.cliniq.bill.dev.dao;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@Entity
@Table(name = "User")
public class UserRoleDAO {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Integer userRoleId;

    @Column(name = "userRoleDAO")
    private String userRole;

    @Column(name = "description")
    private String description;
}
