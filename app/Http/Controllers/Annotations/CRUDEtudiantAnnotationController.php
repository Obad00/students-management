<?php

namespace App\Http\Controllers\Annotations ;

/**
 * @OA\Security(
 *     security={
 *         "BearerAuth": {}
 *     }),

 * @OA\SecurityScheme(
 *     securityScheme="BearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"),

 * @OA\Info(
 *     title="Your API Title",
 *     description="Your API Description",
 *     version="1.0.0"),

 * @OA\Consumes({
 *     "multipart/form-data"
 * }),

 *

 * @OA\PUT(
 *     path="/api/students/1",
 *     summary="Modifier un etudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="password", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 type="object",
 *                 properties={
 *                     @OA\Property(property="matricule", type="string"),
 *                     @OA\Property(property="nom", type="string"),
 *                     @OA\Property(property="prenom", type="string"),
 *                     @OA\Property(property="email", type="string"),
 *                     @OA\Property(property="adresse", type="string"),
 *                     @OA\Property(property="telephone", type="string"),
 *                     @OA\Property(property="photo", type="string"),
 *                 },
 *             ),
 *         ),
 *     ),
 *     tags={"CRUD-Etudiant"},
*),


 * @OA\GET(
 *     path="/api/students/1",
 *     summary="Récuperer un étudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="password", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"CRUD-Etudiant"},
*),


 * @OA\POST(
 *     path="/api/students",
 *     summary="Ajouter un étudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="201", description="Created successfully"),
 * @OA\Response(response="400", description="Bad Request"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="password", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 properties={
 *                     @OA\Property(property="matricule", type="string"),
 *                     @OA\Property(property="nom", type="string"),
 *                     @OA\Property(property="prenom", type="string"),
 *                     @OA\Property(property="email", type="string"),
 *                     @OA\Property(property="adresse", type="string"),
 *                     @OA\Property(property="telephone", type="string"),
 *                     @OA\Property(property="photo", type="string"),
 *                 },
 *             ),
 *         ),
 *     ),
 *     tags={"CRUD-Etudiant"},
*),


 * @OA\GET(
 *     path="/api/students",
 *     summary="Liste des étudiants",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="password", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"CRUD-Etudiant"},
*),


 * @OA\PATCH(
 *     path="/api/students/10/restore",
 *     summary="Restaurer un étudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="password", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"CRUD-Etudiant"},
*),


 * @OA\DELETE(
 *     path="/api/students/10",
 *     summary="Supprimer un étudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="204", description="Deleted successfully"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 * @OA\Response(response="404", description="Not Found"),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="password", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"CRUD-Etudiant"},
*),


*/

 class CRUDEtudiantAnnotationController {}
