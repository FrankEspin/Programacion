package Programación_H1_Parte_2_3doT_Frank_Espin;



class Perro extends Animal{
	private String tamaño;
	
	public Perro (String numero_de_chip , String nombre , int edad, String raza , boolean adoptado, String tamaño) {
		super( numero_de_chip ,  nombre ,  edad,  raza ,  adoptado);
		this.tamaño=tamaño;
	}
	
	// Implementamos el metodo mostrar()
	@Override
	
	public void mostrar() {
		System.out.println("Nos encontramos en el perro: " + nombre);
		System.out.println("El numero de chip del perro es: " + numero_de_chip);
		System.out.println ("El nombre del perro es: " + nombre);
		System.out.println ("La edad del perro es: " + edad);
		System.out.println ("La raza del perro es: " + raza);
		System.out.println("¿El perro es adoptado? : " + adoptado);
		System.out.println("El tamaño del perro es: " + tamaño);
	}
	
}
