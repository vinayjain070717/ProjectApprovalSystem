import java.awt.*;
class aaa extends Frame
{
private Label l1,l2,l3,l4,l5,l6,l7;
private TextField t1,t2;
private Checkbox r1,r2,r3,r4,r5;
private CheckboxGroup g1,g2;
private Checkbox c1,c2,c3;
private Choice cmb;
private List lst;
private Button b,c;
aaa()
{
l1=new Label("Enter roll Number");
t1=new TextField(20);
l2=new Label("Enter Name");
t2=new TextField();
l3=new Label("Select city");
g1=new CheckboxGroup();
r1=new Checkbox("Ujjain",g1,true);
r2=new Checkbox("Indore",g1,false);
r3=new Checkbox("Dewas",g1,false);
l4=new Label("Select Gender");
g2=new CheckboxGroup();
r4=new Checkbox("Male",g2,true);
r5=new Checkbox("Female",g2,false);
l5=new Label("Select your hobbies");
c1=new Checkbox("Reading");
c2=new Checkbox("Painting");
c3=new Checkbox("Singing");
l6=new Label("Select Mother tounge");
cmb=new Choice();
cmb.add("English");
cmb.add("Hindi");
cmb.add("Marathi");
cmb.add("Tamil");
l7=new Label("Visited");
lst=new List(4,true);
lst.add("Mauritus");
lst.add("Singapore");
lst.add("Bangkok");
lst.add("Australia");
lst.add("England");
lst.add("UK");
b=new Button("Save");
c=new Button("Cancel");
setLayout(null);
l1.setBounds(30,40,100,25);
t1.setBounds(140,40,100,25);
l2.setBounds(30,90,100,25);
t2.setBounds(140,90,250,25);
add(l1);
add(t1);
add(l2);
add(t2);
setLocation(10,50);
setSize(500,400);
setVisible(true);
}
}
class Example27psp
{
public static void main(String gg[])
{
aaa a;
a=new aaa();
}
}