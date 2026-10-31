---
name: handoff
description: Updates project memory docs (PROJECT_STATE, TASKS, ARCHITECTURE, DECISIONS), verifies git status, and pushes to origin main.
---

# Handoff Skill

Use this skill when concluding a task or session:
1. Update `docs/PROJECT_STATE.md` (keep <= 100 lines).
2. Update `docs/TASKS.md` (mark completed tasks).
3. Update `docs/ARCHITECTURE.md` if structure changed.
4. Update `docs/DECISIONS.md` if new decisions were made.
5. Verify `git status` for clean staging without secrets.
6. Commit using convention `<type>(<task-id>): <message>`.
7. Push: `git push origin main`.
