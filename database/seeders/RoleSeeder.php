<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ! Creation des permissions

        $permissions = [
            // * Rendez-Vous
            'creer RDV',
            'modifier son  RDV',
            'modifier le  RDV',
            'annuler son  RDV',
            'annuler le  RDV',
            'consulter son  RDV',
            'consulter le  RDV',
            'consulter tous les  RDV',

            // * Dossier_medicale
            'creer dossier medical',
            'modifier dossier medical',
            'consulter son dossier medical',
            'consulter le dossier medical',
            'consulter tous les dossiers medicales',

            // * Notifications
            'creer notification',
            'modifier notification',
            'consulter notification',
            'consulter toutes les notifications',
            'supprimer notification',

            // * Ordonnance 
            'creer ordonnance',
            'modifier ordonnance',
            'consulter ordonnance',
            'consulter toutes les ordonnances',

            'assigner un medecin a un RDV',

        ];

        // ! Ajout des Permissions dans la base de données

        foreach ($permissions as $permission) 
        {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ! Creation des roles

        $SuperAdminRole = Role::firstOrCreate(['name'=> 'super admin']);
        $AdminRole = Role::firstOrCreate(['name'=> 'admin']);
        $MedecinRole = Role::firstOrCreate(['name'=> 'medecin']);
        $AssistantRole = Role::firstOrCreate(['name'=> 'assistant']);
        $PatientRole = Role::firstOrCreate(['name'=> 'patient']);

        // ! Assignation des permissions aux roles

        $SuperAdminRole->givePermissionTo($permissions);

        $AdminRole->givePermissionTo([
            // * Rendez-Vous
            'modifier le  RDV',
            'annuler le  RDV',
            'consulter le  RDV',
            'consulter tous les  RDV',

            // * Dossier_medicale
            'creer dossier medical',
            'modifier dossier medical',
            'consulter le dossier medical',

            // * Notifications
            'creer notification',
            'modifier notification',
            'consulter toutes les notifications',
            'supprimer notification',

            // * Ordonnance
            'creer ordonnance',
            'modifier ordonnance',
            'consulter toutes les ordonnances',

            'assigner un medecin a un RDV',
        ]);

        $AssistantRole->givePermissionTo([
            // * Rendez-Vous
            'creer RDV',
            'modifier le  RDV',
            'annuler son  RDV',
            'modifier son  RDV',
            'annuler le  RDV',
            'consulter son  RDV',
            'consulter le  RDV',
            'consulter tous les  RDV',

            // * Dossier_medicale
            'modifier dossier medical',
            'consulter le dossier medical',

            // * Notifications
            'creer notification',
            'modifier notification',
            'consulter toutes les notifications',
            'supprimer notification',

            // * Ordonnance
            'modifier ordonnance',


            'assigner un medecin a un RDV',
        ]);

        $PatientRole->givePermissionTo([
            // * Rendez-Vous
            'creer RDV',
            'modifier son  RDV',
            'annuler son  RDV',
            'consulter son  RDV',

            // * Dossier_medicale
            'consulter le dossier medical',

            // * Notifications
            'consulter notification',

            // * Ordonnance
            'consulter ordonnance',
        ]);

        $MedecinRole->givePermissionTo([
            // * Rendez-Vous
            'modifier le  RDV',
            'annuler le  RDV',
            'consulter le  RDV',
            'consulter tous les  RDV',

            // * Dossier_medicale
            'creer dossier medical',
            'modifier dossier medical',
            'consulter son dossier medical',

            // * Notifications
            'creer notification',
            'modifier notification',
            'consulter notification',

            // * Ordonnance
            'creer ordonnance',
            'modifier ordonnance',
        ]);
    }
}
