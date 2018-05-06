//Testing the Department name in edit profile page//
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;

import jxl.JXLException;
import jxl.Sheet;
import jxl.Workbook;
import jxl.read.biff.BiffException;

import org.openqa.selenium.*;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.Keys;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.interactions.HasInputDevices;
import org.openqa.selenium.interactions.Keyboard;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;


public class editprofile {

public static void main(String args[]) throws IOException, JXLException, BiffException, FileNotFoundException, InterruptedException
{ 
//initializing a sheet//
Sheet s;
//Giving the excel sheet as input//
FileInputStream fi = new FileInputStream("C:/eclipse/editprofile.xls");
Workbook w = Workbook.getWorkbook(fi);
//Getting the sheet you have your data in//
s = w.getSheet(0);
//Getting the number of rows for that sheet//
int z=s.getRows();
System.out.println("no of rows:"+z);
//Initializing a new driver to test the code//
WebDriver driver = new FirefoxDriver();
driver.get("http://wecharttest.herokuapp.com");
driver.manage().window().maximize();
for(int row=1;row<z;row++) 
{	
    //Getting the elements from excel sheet and inputting them to the elements on the web page//
	//driver.findelement is used for finding elements on the web page to input the values taken from the excel sheet//
String username = s.getCell(0, row).getContents();
System.out.println("Username "+username);
//Sending the user name to the Login text field on the web page//
driver.findElement(By.name("email")).sendKeys(username);
String password= s.getCell(1, row).getContents();
System.out.println("password "+password);
driver.findElement(By.name("password")).sendKeys(password);
Thread.sleep(5000);
driver.findElement(By.name("")).click();
WebDriverWait wait = new WebDriverWait(driver, 10);
WebElement el = wait.until(ExpectedConditions.visibilityOfElementLocated(By.xpath("//*[@id=\"navigation_bar\"]/div/div[2]/ul[2]/li[2]/a")));
el.click();
//driver.findElement(By.xpath("//*[@id=\"navigation_bar\"]/div/div[2]/ul[2]/li[2]/a")).click();
//driver.findElement(By.xpath("//*[@id=\"navigation_bar\"]/div/div[2]/ul[2]/li[2]/a")).click();
//driver.findElement(By.className("dropdown-toggle nav-inverse")).click();
driver.findElement(By.linkText("Edit Profile")).click();
String department=s.getCell(2,row).getContents();
System.out.println("Department"+department);
//To select the department name in dropdown list based on the data in excel sheet//
Select droplist = new Select(driver.findElement(By.id("departmentName")));   
droplist.selectByVisibleText(department);


//If the department is other than the department name in the dropdown list, it goes to the other column in the excel sheet//
if(department.equals("Other")) {
	String otherDept=s.getCell(3,row).getContents();
	Thread.sleep(1000);
	driver.findElement(By.id("newDepartmentName")).sendKeys(otherDept);
}
driver.findElement(By.cssSelector("button[class='btn btn-primary']")).click();

Thread.sleep(5000);
driver.findElement(By.xpath("//*[@id=\"navigation_bar\"]/div/div[2]/ul[2]/li[2]/a")).click();
//driver.findElement(By.className("dropdown-toggle nav-inverse")).click();
driver.findElement(By.linkText("Logout")).click();
}}}

