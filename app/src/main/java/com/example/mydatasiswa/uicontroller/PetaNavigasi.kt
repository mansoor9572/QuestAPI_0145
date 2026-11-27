package com.example.mydatasiswa.uicontroller

import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.navigation.NavHostController
import androidx.navigation.NavType
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import androidx.navigation.navArgument
import com.example.mydatasiswa.uicontroller.route.DestinasiDetail
import com.example.mydatasiswa.uicontroller.route.DestinasiEdit
import com.example.mydatasiswa.uicontroller.route.DestinasiEntry
import com.example.mydatasiswa.uicontroller.route.DestinasiHome
import com.example.mydatasiswa.view.DetailSiswaScreen
import com.example.mydatasiswa.view.EditSiswaScreen
import com.example.mydatasiswa.view.EntrySiswaScreen
import com.example.mydatasiswa.view.HomeScreen

@Composable
fun DataSiswaApp(navController: NavHostController =
    rememberNavController(), modifier: Modifier){
    HostNavigasi(navController = navController)
}

@Composable
fun HostNavigasi(
    navController: NavHostController,
    modifier: Modifier = Modifier
){
    NavHost(navController = navController, startDestination =
        DestinasiHome.route, modifier = Modifier ){
        composable(DestinasiHome.route) {
            HomeScreen(navigateToItemEntry = {
                navController.navigate(DestinasiEntry.route) },
                navigateToItemUpdate = {
                    navController.navigate("${DestinasiDetail.route}/$it")
                }
            )
        }
        composable(DestinasiEntry.route){
            EntrySiswaScreen(navigateBack = {
                navController.navigate(DestinasiHome.route) })
        }
        composable(
            DestinasiDetail.routeWithArgs,
            arguments = listOf(navArgument(DestinasiDetail.itemIdArg) {
                type = NavType.IntType
            })
        ) {
            DetailSiswaScreen(
                navigateToEditItem = {
                    navController.navigate("${DestinasiEdit.route}/$it")
                },
                navigateBack = { navController.navigateUp() }
            )
        }
        composable(
            DestinasiEdit.routeWithArgs,
            arguments = listOf(navArgument(DestinasiEdit.itemIdArg) {
                type = NavType.IntType
            })
        ) {
            EditSiswaScreen(
                navigateBack = { navController.popBackStack() },
                onNavigateUp = { navController.navigateUp() }
            )
        }

    }
}
