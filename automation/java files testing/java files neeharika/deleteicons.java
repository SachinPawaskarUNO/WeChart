/*Testing the trash icons in Admin and Instructor page*/
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;
import java.util.concurrent.TimeUnit;

import jxl.JXLException;
import jxl.Sheet;
import jxl.Workbook;
import jxl.read.biff.BiffException;

import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org. openqa. selenium. chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.interactions.HasInputDevices;
import org.openqa.selenium.interactions.Keyboard;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;


public class deleteicons {

public static void main(String args[]) throws IOException, JXLException, BiffException, FileNotFoundException, InterruptedException{ 
	System.setProperty("webdriver.chrome.driver", "C:/Users/cneeh/eclipse-workspace/Selinium/chromedriver.exe");
	WebDriver driver = new ChromeDriver();
Sheet s;

FileInputStream fi = new FileInputStream("C:/eclipse/deleteicons.xls");
Workbook w = Workbook.getWorkbook(fi);
s = w.getSheet(0);
int z=s.getRows();
System.out.println("no of rows:"+z);
driver.get("http://wecharttest.herokuapp.com");
driver.manage().window().maximize();
int row=1;
String username = s.getCell(0, row).getContents();
System.out.println("Username "+username);
driver.findElement(By.name("email")).sendKeys(username);
String password= s.getCell(1, row).getContents();
System.out.println("password "+password);
driver.findElement(By.name("password")).sendKeys(password);
driver.findElement(By.name("")).click();
driver.findElement(By.xpath("//*[@id=\"app\"]/div[2]/div[2]/div[2]/a[1]")).click();
WebElement element = driver.findElement(By.name("delbutton"));
((JavascriptExecutor) driver).executeScript("arguments[0].scrollIntoView(true);", element);
WebElement elements = driver.findElement(By.id("add-record"));

JavascriptExecutor js = (JavascriptExecutor) driver;
js.executeScript("arguments[0].scrollIntoView();", elements); 
Thread.sleep(2000); 
driver.findElement(By.name("delbutton")).click();
Thread.sleep(2000);
Alert alert = driver.switchTo().alert();
alert.dismiss();
Thread.sleep(3000);
driver.navigate().back();
//driver.findElement(By.linkText("Back to Dashboard")).click();
//driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[2]/div[2]/a[2]")).click();
driver.findElement(By.linkText("Manage Media")).click();
driver.findElement(By.xpath("//*[@id=\"delete\"]/i")).click();
Thread.sleep(2000);
Alert alert1 = driver.switchTo().alert();
alert1.dismiss();
//driver.findElement(By.xpath("//*[@id=\"app\"]/div/div[1]/div/div[1]/div/a")).click();
driver.findElement(By.linkText("Back to Dashboard")).click();
driver.findElement(By.xpath("//*[@id=\"student_minus_delete\"]/i")).click();
Thread.sleep(2000);
Alert alert2 = driver.switchTo().alert();
alert2.dismiss();
//driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[2]/div[1]/a")).click();
/*driver.findElement(By.linkText("Remove Emails")).click();
driver.findElement(By.xpath("//*[@id=\"student_minus_delete\"]/i")).click();
Thread.sleep(2000);
Alert alert3 = driver.switchTo().alert();
alert3.dismiss();
driver.findElement(By.linkText("Back to Dashboard")).click();*/
//driver.findElement(By.className("dropdown-toggle nav-inverse")).click();
driver.findElement(By.xpath("//*[@id=\"navigation_bar\"]/div/div[2]/ul[2]/li/a")).click();
driver.findElement(By.linkText("Logout")).click();
s= w.getSheet(1);
int z1= s.getRows();
System.out.println("No of rows:"+z1);
int row1=1;
String email=s.getCell(0,row1).getContents();
driver.findElement(By.name("email")).sendKeys(email);
String password1=s.getCell(1,row1).getContents();
driver.findElement(By.name("password")).sendKeys(password1);
driver.findElement(By.name("")).click();
driver.findElement(By.linkText("Configure Modules")).click();
WebElement element1 = driver.findElement(By.name("delbutton"));
((JavascriptExecutor) driver).executeScript("arguments[0].scrollIntoView(true);", element1);
//((JavascriptExecutor) driver).executeScript("arguments[0].scrollIntoView(true);", element);
WebElement element2 = driver.findElement(By.id("add-record"));

JavascriptExecutor js1 = (JavascriptExecutor) driver;
js1.executeScript("arguments[0].scrollIntoView();", element2); 
Thread.sleep(2000); 
driver.findElement(By.name("delbutton")).click();
Thread.sleep(2000);
Alert alert4 = driver.switchTo().alert();
alert4.dismiss();
Thread.sleep(3000);
driver.navigate().back();
//driver.findElement(By.linkText("Back to Dashboard")).click();
driver.findElement(By.xpath("//*[@id=\"navigation_bar\"]/div/div[2]/ul[2]/li[2]/a")).click();
driver.findElement(By.linkText("Logout")).click();
}}