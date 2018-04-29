/*Testing the symptoms in ROS module*/
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

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.Keys;
import org.openqa.selenium.firefox.FirefoxDriver;
import org. openqa. selenium. chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.interactions.HasInputDevices;
import org.openqa.selenium.interactions.Keyboard;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;


public class moduleros {

public static void main(String args[]) throws IOException, JXLException, BiffException, FileNotFoundException, InterruptedException{ 
	System.setProperty("webdriver.chrome.driver", "C:/Users/cneeh/eclipse-workspace/Selinium/chromedriver.exe");
	WebDriver driver = new ChromeDriver();
Sheet s;
FileInputStream fi = new FileInputStream("C:/eclipse/moduleros.xls");
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
Thread.sleep(2000);
driver.findElement(By.xpath("//*[@id=\"expandCollapse\"]")).click();
Thread.sleep(2000);
driver.navigate().refresh();
driver.findElement(By.id("patientName")).click();
//driver.navigate().refresh();
driver.findElement(By.xpath("//*[@id=\"Review of System (ROS)_tab\"]")).click();
s= w.getSheet(1);
int z1=s.getRows();
for(int row1=1; row1<z1; row1++ ) {
	String symptoms=s.getCell(0,row1).getContents();
	driver.findElement(By.id(symptoms)).click();
	JavascriptExecutor js = (JavascriptExecutor) driver;
	 js.executeScript("window.scrollBy(0,-250)", "");
}
driver.findElement(By.id("MyButton")).click();
Thread.sleep(5000);
//driver.executeScript("window.history.go(-1)");
JavascriptExecutor js = (JavascriptExecutor) driver;
js.executeScript("window.history.go(-1)");
driver.navigate().back();
//driver.findElement(By.xpath("//*[@id=\"app\"]/div[2]/div[1]/div[1]/a")).click();
driver.findElement(By.xpath("//*[@id=\"expandCollapse\"]")).click();
}}