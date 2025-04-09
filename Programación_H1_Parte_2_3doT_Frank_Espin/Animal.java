package Programación_H1_Parte_2_3doT_Frank_Espin;

public abstract class Animal {
	 protected String numero_de_chip;
	 protected String nombre;
	 protected int edad;
	 protected String raza;
	 protected boolean adoptado;

	 
	 public Animal(String numero_de_chip , String nombre , int edad, String raza , boolean adoptado) {
		 this.numero_de_chip = numero_de_chip;
		 this.nombre=nombre;
		 this.edad=edad;
		 this.raza=raza;
		 this.adoptado=adoptado;
	 }
	 
	 
	 //Añadimos el metodo para obtener el numero de chip del animal
	 public String getnumero_de_chip() {
		 return numero_de_chip;
	 }
	 
	 //Añadimos el mostrar()
	public abstract void mostrar() ;
			
}
