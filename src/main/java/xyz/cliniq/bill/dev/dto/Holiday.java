package xyz.cliniq.bill.dev.dto;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import java.util.Date;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class Holiday {

    private Integer holidayId;
    private HolidayType holidayType;
    private Date dateFrom;
    private Date dateTo;
}
