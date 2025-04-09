package Programación_H1_Parte_2_3doT_Frank_Espin;


public class Gato extends Animal{
	private boolean test_leucemia;
	
	
	public Gato (String numero_de_chip , String nombre , int edad, String raza , boolean adoptado , boolean test_leucemia) {
	super ( numero_de_chip ,  nombre ,  edad,  raza ,  adoptado);
	this.test_leucemia=test_leucemia;
	}
	
	
	// Implementamos el metodo mostrar()
	@Override
	
	public void mostrar() {
		System.out.println("Nos encontramos en el gato: " + nombre);
		System.out.println("El numero de chip del gato es: " + numero_de_chip);
		System.out.println ("El nombre del gato es: " + nombre);
		System.out.println ("La edad del gato es: " + edad);
		System.out.println ("La raza del gato es: " + raza);
		System.out.println("¿El gato es adoptado? : " + adoptado);
		System.out.println("El test de leucemia es positivo: " + test_leucemia);
		}
	
	
	public boolean tieneLeucemia() {
		return test_leucemia;
	}
	
	
	public boolean esAdoptado() {
		return adoptado;
	}
}