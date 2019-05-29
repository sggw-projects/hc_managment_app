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
@Table(name = "HolidayType")
public class HolidayTypeDAO {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Integer holidayTypeId;

    @Column(name = "holidayType")
    private String holidayType;

    @Column(name = "returnPercentage")
    private Integer returnPercentage;
}
