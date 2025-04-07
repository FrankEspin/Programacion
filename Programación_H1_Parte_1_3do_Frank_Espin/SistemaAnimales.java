package Programación_H1_Parte_1_3do_Frank_Espin;

import java.util.HashMap;

public class SistemaAnimales {
	private HashMap<String, Animal> animales = new HashMap<>();
	
	
	public void altaAnimal(Animal animal) {
        if (animales.containsKey(animal.getnumero_de_chip())) {
            System.out.println("Error: Este número de chip ya está registrado en el sistema de animales.");
        } else {
            animales.put(animal.getnumero_de_chip(), animal);
            System.out.println("El animal se ha dado de alta correctamente.");
        }
	}

	public void buscarAnimalID(String numero_de_chip) {
        Animal animal = animales.get(numero_de_chip);
        if (animal != null) {
            animal.mostrar();
        } else {
            System.out.println("Este animal no existe.");
        }
    }
}
