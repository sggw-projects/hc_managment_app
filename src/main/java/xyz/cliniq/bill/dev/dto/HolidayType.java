package xyz.cliniq.bill.dev.dto;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class HolidayType {

    private Integer holidayTypeId;
    private String holidayType;
    private Integer returnPercentage;
}
