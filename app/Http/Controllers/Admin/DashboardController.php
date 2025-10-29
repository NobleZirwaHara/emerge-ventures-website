<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entrepreneur;
use App\Models\DigitalSkill;
use App\Models\Service;
use App\Models\TeamMember;
// WorkspaceBooking model is optional
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // User Analytics
        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', Carbon::now()->month)->count();
        $userGrowthRate = $this->calculateGrowthRate(User::class);
        
        // Entrepreneur Metrics
        $totalEntrepreneurs = Entrepreneur::count();
        $pendingEntrepreneurs = Entrepreneur::where('status', 'pending')->count();
        $verifiedEntrepreneurs = Entrepreneur::where('status', 'approved')->count();
        
        // Service Metrics
        $totalServices = Service::count();
        $activeServices = Service::where('is_active', true)->count();
        
        // Digital Skills Metrics
        $totalDigitalSkills = DigitalSkill::count();
        $popularSkills = $this->getPopularSkills();
        
        // Team Metrics
        $totalTeamMembers = TeamMember::count();
        
        // Workspace Metrics - Disabled as WorkspaceBooking model is not available
        $totalWorkspaceBookings = 0;
        $upcomingBookings = collect([]);
            
        // Recent Activities
        $recentEntrepreneurs = Entrepreneur::latest()
            ->take(5)
            ->get();
            
        // Charts Data
        $userGrowthChart = $this->getUserGrowthData();
        $entrepreneurGrowthChart = $this->getEntrepreneurGrowthData();
        
        return view('admin.dashboard', compact(
            // User Analytics
            'totalUsers',
            'newUsersThisMonth',
            'userGrowthRate',
            
            // Entrepreneur Metrics
            'totalEntrepreneurs',
            'pendingEntrepreneurs',
            'verifiedEntrepreneurs',
            
            // Service Metrics
            'totalServices',
            'activeServices',
            
            // Digital Skills Metrics
            'totalDigitalSkills',
            'popularSkills',
            
            // Team Metrics
            'totalTeamMembers',
            
            // Workspace Metrics
            'totalWorkspaceBookings',
            'upcomingBookings',
            
            // Recent Activities
            'recentEntrepreneurs',
            
            // Charts Data
            'userGrowthChart',
            'entrepreneurGrowthChart'
        ));
    }
    
    private function calculateGrowthRate($model)
    {
        $currentMonth = $model::whereMonth('created_at', Carbon::now()->month)->count();
        $lastMonth = $model::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
        
        if ($lastMonth === 0) {
            return $currentMonth > 0 ? 100 : 0;
        }
        
        return round((($currentMonth - $lastMonth) / $lastMonth) * 100, 2);
    }
    
    private function getPopularSkills()
    {
        return DigitalSkill::where('is_active', true)
            ->latest()
            ->take(5)
            ->get(['id', 'title']);
    }
    
    private function getUserGrowthData()
    {
        $data = [];
        $labels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');
            
            $data[] = User::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }
        
        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
    
    private function getEntrepreneurGrowthData()
    {
        $data = [];
        $labels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');
            
            $data[] = Entrepreneur::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }
        
        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
}