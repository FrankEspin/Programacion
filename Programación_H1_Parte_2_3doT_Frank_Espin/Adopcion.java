package Programación_H1_Parte_2_3doT_Frank_Espin;

public class Adopcion {
	private Animal animal;
	private String nombrePersona;
	private String dniPersona;
	
	public Adopcion (Animal animal, String nombrePersona, String dniPersona) {
		this.animal=animal;
		this.nombrePersona=nombrePersona;
		this.dniPersona=dniPersona;
		
	}
	
	public void mostrar() {
		System.out.println("El animal ha sido adoptado");
		animal.mostrar();
		System.out.println("Ha sido adoptado por : " + nombrePersona + "con DNI: " + dniPersona);
	}
	
	public Animal getAnimal() {
		return animal;
	}
}
