/*Testing the diagnosis search in patient active record*/
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
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
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.interactions.HasInputDevices;
import org.openqa.selenium.interactions.Keyboard;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;


public class test {

public static void main(String args[]) throws IOException, JXLException, BiffException, FileNotFoundException, InterruptedException{ 
WebDriver driver = new FirefoxDriver();
Sheet s;

FileInputStream fi = new FileInputStream("C:/eclipse/diagnosis.xls");
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
Thread.sleep(5000);
driver.findElement(By.name("")).click();
System.out.println("Login Pass");
Thread.sleep(1000);
driver.findElement(By.xpath("//*[@id=\"expandCollapse\"]")).click();
driver.findElement(By.id("patientName")).click();
driver.findElement(By.id("Disposition_tab")).click();
s = w.getSheet(1);
int z1=s.getRows();
System.out.println("no of rows"+z1);
for(int row1=0; row1<s.getRows();row1++) {
String diagnosis=s.getCell(0,row1).getContents();
System.out.println("Diagnosis"+diagnosis);
driver.findElement(By.className("select2-search__field")).sendKeys(diagnosis);
Thread.sleep(3000);
	Actions action = new Actions(driver); 
	action.sendKeys(Keys.ENTER).build().perform();}
	
	driver.findElement(By.id("disposition_admitted")).click();
	driver.findElement(By.id("disposition_comment")).sendKeys("This is a comment");
	 driver.findElement(By.id("btn_save_disposition")).click();
	 driver.findElement(By.id("delete")).click();  
	 Alert alert = driver.switchTo().alert();
	 alert.accept();
	 Thread.sleep(3000);
	 driver.findElement(By.linkText("Back to Dashboard")).click();
	 driver.findElement(By.id("expandCollapse")).click();
}
}

