package Programación_H1_Parte_1_3do_Frank_Espin;

public class Principal {
	public static void main (String []args) {
		SistemaAnimales sistema = new SistemaAnimales();

    // Alta de perros 
    sistema.altaAnimal(new Perro("001", "Fido", 3, "Labrador", true, "Mediano" ));
    sistema.altaAnimal(new Perro("002", "Rocky", 3, "Rottweiler", false, "Grande"));
    sistema.altaAnimal(new Perro("003", "Hades", 3, "Cane Corso", false, "Grande"));
    sistema.altaAnimal(new Perro("004", "Fuet", 3, "Salchicha", true, "Pequeño"));
   
    
    //Alta de Gatos
    sistema.altaAnimal(new Gato("005", "Luna", 2, "Egipcio", true, false));
    sistema.altaAnimal(new Gato("006", "Thor", 2, "Siames", true, false));
    sistema.altaAnimal(new Gato("007", "Rayo", 2, "Maine Coon", true, false));
    sistema.altaAnimal(new Gato("008", "Garfield", 2, "Persa", true, false));
    System.out.println();
    System.out.println("Trabajo realizado por FRANK");

    // Búsqueda de los anuimales por Id
    System.out.println("Estos son los animales que hermos encontrados por el ID: ");
    System.out.println();
    sistema.buscarAnimalID("002");
    System.out.println();
    sistema.buscarAnimalID("005");
    System.out.println();
    sistema.buscarAnimalID("003");
    System.out.println();
    sistema.buscarAnimalID("008");
	}
}







  

