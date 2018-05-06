using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace WeChartAutoTests.Support
{
    public class WeChartCommonVariables
    {
        public static string websiteURL = "http://wecharttest.herokuapp.com";
        public static string userID = "student@wechart.com";
        public static string password = "123456";
        public static string emailField = "//input[@id='email']";
        public static string passwordField = "//input[@id='password']";
        public static string submitButton = "//button[@type='submit']";
        public static string dashboardLanding = "//h3[text()=' Student Dashboard ']";
        public static string genderRadio = "//label[text()='Sex']/following::div/input[@value='gender']";
        public static string moduleSelection = "//label[text()='Module']/following::div/select";
        public static string roomNoField = "//input[@id='room_number']";
        public static string ageField = "//input[@id='age']";
        public static string visitDateField = "//input[@id='visit_date']";
        public static string setComboList = "//label[text()=' type:']/following::div//span[@role='combobox'][1]";
        public static string scrollBar1 = "//div[@class='col-md-2']//div[@class='ScrollStyle']";
        public static string scrollBar2 = "//div[@class='col-md-6']//div[@class='ScrollStyle']";
        public static string scrollBar3 = "//div[@class='col-md-4']//div[@class='ScrollStyle']";
    }
}
