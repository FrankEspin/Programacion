package Programación_H1_Parte_2_3doT_Frank_Espin;

import java.util.HashMap;
import java.util.ArrayList;

public class SistemaAnimales {
    private HashMap<String, Animal> animales = new HashMap<>();
    private ArrayList<Adopcion> adopciones = new ArrayList<>();

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

    public void realizarAdopcion(String numero_de_chip, String nombre, String dni) {
        Animal animal = animales.get(numero_de_chip);
        if (animal == null) {
            System.out.println("No existe un animal con ese número de chip.");
        } else {
            Adopcion adopcion = new Adopcion(animal, nombre, dni);
            adopciones.add(adopcion);
            System.out.println("Adopción registrada .");
        }
    }
    
    public void listarAnimales() {
        if (animales.isEmpty()) {
            System.out.println("No hay animales registrados en el sistema.");
        } else {
            System.out.println("Lista de animales registrados:");
            for (Animal animal : animales.values()) {
                animal.mostrar();
                System.out.println(); 
            }
        }
    }
    
    public void bajaAnimal(String numero_de_chip) {
        if (animales.containsKey(numero_de_chip)) {
            animales.remove(numero_de_chip);
            adopciones.remove(numero_de_chip); 
            System.out.println("Animal ha sido dado de baja.");
        } else {
            System.out.println("No existe ningun animal con ese chip.");
        }
    }
    
    public void estadisticasGatos() {
    	int total = 0;
    	int adoptados = 0;
    	int leucemia = 0;
    	
    	for (Animal animal : animales.values()) {
    		if (animal instanceof Gato) {
    			Gato gato = (Gato) animal;
    			total++;
    			if (gato.esAdoptado()) adoptados++;
    			if (gato.tieneLeucemia()) leucemia++;
    		}
    	}
    	
    	if (total ==0) {
    		System.out.println("No hay gatos registrados");
    	} else {
    		System.out.println ();
    		System.out.println ("Estas son las estadisticas de los gatos: ");
    		System.out.println ("El numero total es de : " + total);
    		System.out.println ("El numero de los adoptados es de : " + adoptados);
    		System.out.println ("Con el test de leucemia positivo : " + leucemia);
    	}
    }

}
